<template>
 <div class="container-fluid">
   <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Participants</span>
  </nav>
  <div class="app-content">
    <div class="app-list">
      <h1>List</h1>
      <div v-if="participants.length > 0" class="app-list-constent">
        <div v-for="participant in participants" v-bind:key="participant.id">
          {{ participant.name }} {{ participant.surname}} 
          <button v-on:click="onRemove(participant)" class="btn btn-danger" type="button">Remove</button>
        </div>
      </div>
      <div class="alert alert-warning" role="alert" v-else>
        Noone here :c 
      </div>
    </div>
    <div class="app-add-form">
      <form v-on:submit.prevent="onSubmit()">
        <h1>Add participant</h1>
        <div class="form-group">
          <label for="participantName">Name</label>
          <input v-model="newParticipantName" type="text" class="form-control" id="participantName" placeholder="Fill name">
        </div>
        <div class="form-group">
          <label for="participantSurname">Surname</label>
          <input v-model="newParticipantSurname" type="text" class="form-control" id="participantSurname" placeholder="Fill surname">
        </div>
        <button class="btn btn-info" type="submit">Submit</button>
      </form>
    </div>
  </div>
 </div>
</template>

<script>
  export default {
    data: function () {
      return {
        participants: [],
        newParticipantName: '',
        newParticipantSurname: '',
      }
    },
    methods: {
      onSubmit: function (){
        const newParticipant = {
          name: this.newParticipantName,
          surname: this.newParticipantSurname,
          id: Math.random(),
        }
        this.participants.push(newParticipant);
        this.newParticipantSurname = '';
        this.newParticipantName = '';
      },
      onRemove: function (participantToRemove){
        this.participants = this.participants.filter((participant) => {
          return participant.id !== participantToRemove.id;
        });
      }
    }
  };
</script>

<style>
.container-fluid {
  margin: 0;
  padding: 0;
}

.app-content {
  margin: 30px;
}
</style>