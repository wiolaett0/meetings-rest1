<template>
    <div class="app-list">
      <h1>List</h1>
      <div v-if="participants.length > 0" class="app-list-constent">
        <div class="app-list-item" v-for="participant in participants" v-bind:key="participant.id">
          <span class="app-list-item-data">{{ participant.name }} {{ participant.lastName}}</span>
          <button v-on:click="onRemove(participant)" class="btn btn-danger" type="button">Remove</button>
        </div>
      </div>
      <div class="alert alert-warning" role="alert" v-else>
        Noone here :c 
      </div>
    </div>
</template>

<script>
export default {
    data: function (){
        return {}
    },
    props: ['participants'],
    methods: {
        onRemove: function (participant) {
            this.$emit('remove-participant', participant);
        }
    }
}
</script>

<style>
.app-list-constent {
    margin: 2rem 0;
}

.app-list-item {
    margin: 0.5rem;
    padding: 0.5rem;
    border: 1px solid #999;
    display: flex;
}

.app-list-item:hover {
  border: 1px solid #dc3545;
  background-color: #f7f7f7;
}

.app-list-item-data {
    flex: 1;
}

</style>