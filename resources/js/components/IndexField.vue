<template>
    <div>
        <div class="flex items-center space-2 ml-3">
            <div v-for="item in data" :key="item.id" style="background-color:#4099de" class="relative group overflow-hidden p-2 rounded-lg flex space-x-2 items-center mr-2">
                <span class="relative btn text-white">{{  item.tag }}</span>
                <div class="flex items-center">
                    <svg @click="remove(item)" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 cursor-pointer hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field', 'resource'],


    data(){
        return {
            data: this.field.value
        }
    },

    mounted(){
        console.log(this.field.value[0].tag)
    },


    methods:{
        remove(item){


            Nova.request().post('/nova-vendor/scouser03/multi-select/delete', {
                table: this.field.table,
                field: item.pivot
                
            }).then(response => {
                this.data = this.data.filter((mapItem) => mapItem !== item);
                this.$toasted.show(`${item.tag} has been deleted`, {type: "success"});
            })
        }
    }
}


</script>

