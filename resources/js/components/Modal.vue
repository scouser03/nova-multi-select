<template>
    <div
        class="modal select-none fixed pin z-50 overflow-x-hidden overflow-y-auto"
    >
        <div class="relative mx-auto flex justify-center z-20 py-view">
            <div>
                <form
                    class="bg-white rounded-lg shadow-lg overflow-hidden"
                    style="width: 460px;"
                >
                    <div class="p-8">
                        <h2 class="mb-6 text-90 font-normal text-xl">
                            Detach {{ item[label] }}
                        </h2>
                        <p class="text-80 leading-normal">
                            Are you sure you want to detach {{ item[label] }}?
                        </p>
                    </div>
                    <div class="bg-30 px-6 py-3 flex">
                        <div class="ml-auto">
                            <button
                                type="button"
                                @click="close"
                                class="btn text-80 font-normal h-9 px-3 mr-3 btn-link"
                            >
                                Cancel
                            </button>
                            <button
                                @click="destroy"
                                type="button"
                                class="btn btn-default btn-danger"
                            >
                                <span class="">
                                    Detach
                                </span>
                                <!---->
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'modal',
    props: {
        item: {
            type: Object,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
    },
    methods: {
        close() {
            this.$emit('close')
        },
        destroy() {
            this.$emit('destroy', this.item)
        },
    },
}
</script>
