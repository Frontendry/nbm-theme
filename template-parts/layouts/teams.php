<?php
$teams_container = get_sub_field( 'teams' );
$teams_title = $teams_container ['teams_title'];
$teams_subtitle = $teams_container['teams_subtitle'];
$teams_members = $teams_container['team_members'];

if( !empty( $teams_members ) ) : ?>
<div class="row teams-row row-bottom-space-2">
    <div class="col teams-col x-space-3">
        <div class="teams">
            <div class="teams-header section-header text-center">
                <h3 class="section-header-title"><?php echo $teams_title; ?></h3>
                <p><?php echo $teams_subtitle; ?></p>
            </div>
            <!-- .teams-header -->

            <div class="teams-body">
                <div class="teams-collection">

                    <?php
                    foreach( $teams_members as $team_member ) : ?>
                    <div class="teams-el">
                        <figure class="teams-img">
                            <img src="<?php echo $team_member['team_profile_image']['url']; ?>" class="img-fluid">
                        </figure>
                        <!-- .teams-img -->

                        <div class="teams-text">
                            <p class="team-name"><?php echo $team_member['team_profile_name']; ?></p>                                                    
                        </div>
                        <!-- .teams-text -->
                    </div>
                    <!-- .teams-el -->
                    <?php endforeach; ?>
                </div>
                <!-- .teams-collection -->
            </div>
            <!-- .teams-body -->
        </div>
        <!-- .teams -->
    </div>
    <!-- .teams-col -->
</div>
<!-- .teams-row -->
<?php endif; ?>