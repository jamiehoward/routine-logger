<template>
    <div class="container-fluid">

        <div class="col">
            <ul class="routine-list">
                <li v-for="routine in routines" class="routine-list-item">
                    <a v-bind:href="getRoutineLink(routine)">{{ routine.name }}</a>
                </li>
            </ul>

            <div class="row">
                <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addRoutineModal">&plus; Add routine</button>
            </div>
        </div>

        <div class="modal fade" id="addRoutineModal" tabindex="-1" role="dialog" aria-labelledby="addRoutineLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRoutineLabel">Add a new routine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form" v-on:submit.prevent="addRoutine()">

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" v-model="routineName" required/>
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-control" v-model="routineType">
                            <option value="count">count</option>
                            <option value="interval">interval</option>
                        </select>
                    </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" v-on:click="addRoutine()">Add Routine</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function() {
            return {
                routines : [],
                routineName : '',
                routineType : 'count'
            };
        },
        mounted() {
            this.getRoutines()
        },
        methods : {
            getRoutines : function() {
                const self = this
                axios.get('/api/routines')
                    .then(function(response) {
                        self.routines = response.data
                    })
            },
            getRoutineLink : function(routine) {
                return "/routines/" + routine.id
            },
            addRoutine : function() {
                const self = this
                axios.post('/api/routines', {name : self.routineName, type : self.routineType})
                    .then(function(response) {
                        self.routineName = ''

                        swal('Success', 'Routine added successfully', 'success');
                        self.getRoutines()

                        $("#addRoutineModal").modal('hide')
                    }) 
            }
        }
    }
</script>
