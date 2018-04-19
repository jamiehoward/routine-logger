<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{routine.name}}</div>

                    <div class="card-body">
                        <form class="form" v-on:submit.prevent="addCountEntry()" v-if="routine.type == 'count'">

                            <div class="form-group">
                                <label for="count" class="form-label">Count</label>
                                <input type="number" name="count" class="form-control" v-model="entryCount" required/>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit entry</button>
                            </div>

                        </form>

                        <div class="row" v-if="routine.type == 'interval'">
                            <button class="btn btn-primary btn-lg btn-block" v-on:click="startTimer()" id="startTimerButton">Start a new timed entry</button>

                            <button class="btn btn-info btn-lg btn-block d-none" v-on:click="stopTimer()" id="stopTimerButton">{{duration}}</button>
                        </div>

                        <hr />

                        <div class="row">
                            <ul>
                                <li v-for="entry in routine.entries">
                                    <span v-if="routine.type == 'count'" class="badge badge-primary">
                                        {{entry.count}}
                                    </span>
                                    {{ entry.created_at }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'routineId'
        ],
        data : function() {
            return {
                routine : [],
                entryCount : 0,
                duration : '00:00:00'
            };
        },
        mounted() {
            this.getRoutine()
        },
        methods : {
            getRoutine : function() {
                const self = this
                axios.get('/api/routines/' + self.routineId)
                    .then(function(response) {
                        self.routine = response.data
                    })
            },
            addEntry : function(params) {
                const self = this
                axios.post('/api/routines/' + self.routineId + '/entries', params)
                    .then(function(response) {
                        swal('Success', 'Entry added', 'success').then(function() {
                            window.location.reload()
                        })
                    })
            },
            addCountEntry : function() {
                this.addEntry({count: this.entryCount})
            },
            startTimer : function() {
                var start = moment.now()
                const self = this

                $("#startTimerButton").fadeOut();
                $("#stopTimerButton").removeClass('d-none');

                setInterval(function(){
                    self.duration = self.hhmmss(moment().diff(moment(start), 'seconds'))
                }, 1000);
            },
            pad: function(num) {
                return ("0"+num).slice(-2);
            },
            hhmmss: function(secs) {
              var minutes = Math.floor(secs / 60);
              secs = secs%60;
              var hours = Math.floor(minutes/60)
              minutes = minutes%60;
              return this.pad(hours)+":"+this.pad(minutes)+":"+this.pad(secs);
            },
            stopTimer : function() {
                var seconds = moment.duration(this.duration).seconds;
                this.addEntry({count: seconds})
            },
        }
    }
</script>
