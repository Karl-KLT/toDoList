<template>
    <div>
        <!-- <div v-for="Task,index in Data">

        </div> -->
        <table class="table fw-bold text-center table-light rounded">
            <thead>
                <tr>
                    <td>task</td>
                    <td>form</td>
                    <td>action</td>
                </tr>
            </thead>
            <tbody v-for="Task in Data">
                <tr>

                    <td>{{ Task.text }}</td>

                    <td>{{ Task.created_at }}</td>

                    <td>
                        <button @click="deleteTask(Task.id)">delete</button>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name:'Tasks',
        props:['Data'],
        methods:{
            deleteTask(id){
                this.$emit('deleteEvent',{'id':id}.id)
            }
        }
    }
</script>
