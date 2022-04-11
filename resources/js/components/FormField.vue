<template>
  <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
    <template slot="field">

      <multiselect 
        v-model="value" 
        :options="options"
        :multiple="true"
        label="tag" 
        track-by="id"
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

  data () {
      return {
        value: null,
        options: this.field.data
      }
    },


  mounted(){
    console.log(this.field);
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
      const ids = this.value.map((obj) => obj['id'])
      formData.append(this.field.attribute, ids || '')
    },
  },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

