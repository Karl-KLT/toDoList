<template>
    <div>
        <!-- input -->
        <div>
            <div class="d-flex flex-row">
                <input type="text" v-model="text" class="form-control" placeholder="ur Task">
                <button class="btn btn-dark mx-2"  @click="save">save</button>
            </div>
        </div>

        <div class="border mt-3 border-dark" style="overflow-y: scroll;max-height: 250px;">
            <Tasks :Data="Data" @delete-event="DeleteTask"></Tasks>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Tasks from './vue/components/Tasks.vue'
    export default {
        name:'App',
        data(){
            return {
                text:null,
                Data:null
            }
        },
        methods: {
            save(){
                if(this.text){
                    try{
                        axios.post('/Task/add',({
                            text:this.text
                        })).then((data)=>{
                            console.log(data.data)
                            this.getAllTasks();
                            this.text = ''
                        })
                    }catch(err) {console.log(err)}
                }
            },
            getAllTasks(){
                try{
                    axios.get('/Task/get').then((data)=>{
                        this.Data = data.data
                    })
                }catch(err) {console.log(err)}

            },
            DeleteTask(id){
                try{
                    axios.post('/Task/delete',({
                        task_id:id
                    })).then((data)=>{
                        this.getAllTasks();
                    })
                }catch(err) {console.log(err)}
            }
        },
        beforeMount(){
            this.getAllTasks()
        },
        components:{
            Tasks
        }
    }
</script>
