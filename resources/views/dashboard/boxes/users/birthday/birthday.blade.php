<!-- GitHub commits -->
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="lead">{{_('Birthdays Today')}}</span>
    </div>

    <div class="panel-body birthday-widget">
        <?php
        $birthdayUsers = app()->make('App\Helper\BirthdayHelper')->getUsersWithBirthdayToday();
        ?>
        @if($birthdayUsers->count() === 0)
            <div class="birthday-widget__text">
                No cake today <span class="fa fa-meh-o"></span>
            </div>
        @else
            <div class="birthday-widget__cake">
                <img src="/images/birthday_cake.png" alt="CAAAAKE" />
            </div>
            <div class="birthday-widget__text">
                <?php
                $user_string = $birthdayUsers->shift()->name;
                foreach($birthdayUsers as $user) {
                    $user_string .= ', ' . $user->name;
                }
                $user_string .= ' is making cake for the office!!';
                ?>
                {{$user_string}}
            </div>
        @endif
    </div>

    <div class="panel-footer clearfix">
        <div class="pull-left">
            <i class="fa fa-birthday-cake"></i> <span class="text-muted">CAKE REMINDER</span>
        </div>
    </div>
</div>
