(function($) {
  "use strict";
  $(document).ready(function() {
    const bodyel = $("body"),
      addLayoutTriggerStr = ".acf-field-5d3c460750af8 .acf-actions .acf-button",
      acfCheckBoxSelect = $(".acf-checkbox-list");

    let selectedCategoryBList = $(".layout")
        .not(".acf-clone")
        .find(
          ".acf-fields .acf-field-5d40097b6495f .acf-input .acf-taxonomy-field .categorychecklist-holder"
        )
        .children("ul.acf-checkbox-list"),
      selectedCategoryCList = $(".layout")
        .not(".acf-clone")
        .find(
          ".acf-fields .acf-field-5d425d7105106 .acf-input .acf-taxonomy-field .categorychecklist-holder"
        )
        .children("ul.acf-checkbox-list");

    let setTitleCategoriesFn = function(ajaxField) {
      $(document).ajaxComplete(function(event, request, settings) {
        let titleCategoryBContainer = $(
          ".select2-results__options[id*=" + ajaxField + "]"
        );

        titleCategoryBContainer.children("li").each(function() {
          let categoryAssociated = $(this)
            .find(".extra-details")
            .html();

          $(this).attr({
            "data-catids": categoryAssociated
          });
        });
      });
    };

    let filterRelatedCategoryPostFn = function(
      selectedCategoryList,
      selectedAjaxField
    ) {
      let selectedCategoryId;

      selectedCategoryList.each(function() {
        let selectedCategory = $(this).find(".selected");
        selectedCategoryId = selectedCategory.parent("li").attr("data-id");
        console.log(selectedCategoryId);
        postsCall();
      });

      selectedCategoryList.on("click", "li", function() {
        let selectedCategory = $(this);
        selectedCategoryId = selectedCategory.attr("data-id");
        console.log(selectedCategoryId);
        postsCall();
      });

      function postsCall() {
        $(document).ajaxComplete(function(event, request, settings) {
          let titleCategoryBContainer = $(
              ".select2-results__options[id*=" + selectedAjaxField + "]"
            ),
            titleCategoryBContainerList = titleCategoryBContainer.children(
              "li"
            );

          titleCategoryBContainerList.each(function() {
            if ($(this).attr("data-catids") != undefined) {
              let catIdsVal = $(this).attr("data-catids"),
                catIdsValArray = catIdsVal.split(" ");
              if (catIdsValArray.indexOf(selectedCategoryId) != -1) {
                $(this).addClass("filtered-post-category");
              }
            }
          });
        });
      }
    };

    let categoryGroupFn = function(
      argSelectedCategoryList,
      argAjaxFieldString
    ) {
      if (argSelectedCategoryList.length) {
        let ajaxFieldString = argAjaxFieldString;

        setTitleCategoriesFn(ajaxFieldString);

        filterRelatedCategoryPostFn(argSelectedCategoryList, ajaxFieldString);
      }
    };

    const app = {
      init: function() {
        app.getAcfFieldsFn();
        app.generalPostObjectSelectFn();
        app.getSelectedCategoryBFn();
        app.getSelectedCategoryCFn();
        //app.dragChoicesFn();
      },
      getAcfFieldsFn: function() {
        if (
          $(addLayoutTriggerStr).length &&
          selectedCategoryBList.length == 0 &&
          selectedCategoryCList.length == 0
        ) {
          bodyel.on("click", addLayoutTriggerStr, function() {
            let acfLayoutTooltip = $(this)
                .closest(bodyel)
                .find(".acf-fc-popup"),
              selectedCategoryBListTrigger = acfLayoutTooltip.find(
                '[data-layout="post_collection_b"]'
              ),
              selectedCategoryCListTrigger = acfLayoutTooltip.find(
                '[data-layout="post_collection_c"]'
              );

            selectedCategoryBListTrigger.on("click", function() {
              console.log("loaded");

              selectedCategoryBList = $(this)
                .closest(bodyel)
                .find(
                  ".layout .acf-fields .acf-field-5d40097b6495f .acf-input .acf-taxonomy-field .categorychecklist-holder"
                )
                .children("ul.acf-checkbox-list");

              console.log(selectedCategoryBList);

              categoryGroupFn(selectedCategoryBList, "field_5d400e6453516");
            });

            /* $(document).on(
              "click",
              '.acf-fc-popup a[data-layout="post_collection_b"]',
              function() {
                console.log("loaded");
                selectedCategoryBLista = $(this)
                  .closest(bodyel)
                  .find(".layout")
                  .not(".acf-clone")
                  .find(
                    ".acf-fields .acf-field-5d40097b6495f .acf-input .acf-taxonomy-field .categorychecklist-holder"
                  )
                  .children("ul.acf-checkbox-list");

                console.log(selectedCategoryBLista);

                app.getSelectedCategoryBFn();
              }
            ); */

            /*  selectedCategoryBListTrigger.on("click", function() {
              console.log("loaded");
              selectedCategoryBList = $(this)
                .closest(bodyel)
                .find(".layout")
                .not(".acf-clone")
                .find(
                  ".acf-fields .acf-field-5d40097b6495f .acf-input .acf-taxonomy-field .categorychecklist-holder"
                )
                .children("ul.acf-checkbox-list");

              console.log(selectedCategoryBList);

              app.getSelectedCategoryBFn();
            });

            selectedCategoryCListTrigger.on("click", function() {
              console.log("also loaded");
              selectedCategoryCList = $(this)
                .closest(bodyel)
                .find(".layout")
                .not(".acf-clone")
                .find(
                  ".acf-fields .acf-field-5d425d7105106 .acf-input .acf-taxonomy-field .categorychecklist-holder"
                )
                .children("ul.acf-checkbox-list");

              app.getSelectedCategoryCFn();
            }); */
          });
        }
      },
      generalPostObjectSelectFn: function() {
        $(document).ajaxComplete(function(event, request, settings) {
          let select2_results__options = $(".select2-results__options");

          select2_results__options.addClass("remove-preloader");
        });
      },

      getSelectedCategoryBFn: function() {
        categoryGroupFn(selectedCategoryBList, "field_5d400e6453516");
      },

      getSelectedCategoryCFn: function() {
        categoryGroupFn(selectedCategoryCList, "field_5d425d7105107");
      },

      dragChoicesFn: function() {
        if (acfCheckBoxSelect.length) {
          acfCheckBoxSelect.sortable();
        }
      }
    };

    app.init();
  });
})(jQuery);
