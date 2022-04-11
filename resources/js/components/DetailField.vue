<template>
    <div class="flex border-b border-40 -mx-6 px-6">
    <div class="w-1/4 py-4">
      <slot>
        <h4 class="font-normal text-80">here</h4>
      </slot>
    </div>
    <div class="w-3/4 py-4 break-words">
      <slot name="value">
        <p class="text-90">
            <div v-if="data.length" class="flex items-center space-2">
                <div v-for="(item, index) in data" :key="item.id" style="background-color:#4099de" class="relative group overflow-hidden px-2 py-1 rounded-lg flex items-center mr-2">
                    <span class="relative btn text-white">{{  item[name] }}</span>
                    <div class="flex items-center">
                        <svg @click="remove(item)" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 font-bold cursor-pointer hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            <span v-else>-</span>
        </p>
      </slot>
    </div>
  </div>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
    data(){
        return {
            data: this.field.value,
            name: this.field.displayName
        }
    },

    methods:{
        remove(item){
            Nova.request().post('/nova-vendor/scouser03/multi-select/delete', {
                table: this.field.table,
                field: item.pivot
            }).then(response => {
                this.data = this.data.filter((mapItem) => mapItem !== item);
                this.$toasted.show(`${item[this.name]} has been deleted`, {type: "success"});
            })
        }
    }
}

</script>