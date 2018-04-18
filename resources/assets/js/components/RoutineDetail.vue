<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{routine.name}}</div>

                    <div class="card-body">
                        <ul>
                            <li v-for="entry in routine.entries">
                                {{ entry.created_at }}
                            </li>
                        </ul>
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
                routine : []
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
            }
        }
    }
</script>
