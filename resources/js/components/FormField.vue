<template>
    <default-field
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
    >
        <template slot="field">
            <multiselect
                v-model="value"
                :options="options"
                :multiple="true"
                :label="label"
                :track-by="inputId"
            >
            </multiselect>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import Multiselect from 'vue-multiselect'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    components: { Multiselect },

    data() {
        return {
            value: null,
            options: this.field.data,
            label: this.field.label,
            inputId: this.field.inputId,
        }
    },

    mounted() {
        console.log(this.field)
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            const ids = this.value.map(obj => obj[this.inputId])
            formData.append(this.field.attribute, ids || '')
        },
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.multiselect__tag,
.multiselect__option--highlight {
    background: #4099de;
}

.multiselect__tag-icon:hover {
    background: #0281e2;
}

.multiselect__option--highlight:after {
    background: #4099de;
}
</style>
