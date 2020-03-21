<template>
    <div class="dropdown">
        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span>
            <span class="badge">{{unreads.length}}</span></button>
        <ul class="dropdown-menu">
            <li>
<!--                <notification-item></notification-item>-->
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:['unreads','studentid'],
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.Models.Student.' + this.studentid)
                .notification((notification) => {
                    console.log(notification);
                });
            // window.Echo.private('App.Models.Student.' + userId)
            //     .listen(".Illuminate\\Notifications\\Events\\BroadcastNotificationCreated",(notification) => {
            //         window.console.log('Got event...');
            //     });
        }
    }
</script>
