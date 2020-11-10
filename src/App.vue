<template>
 <div class="container-fluid">
   <nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1">Participants</span>
  </nav>
  <div class="app-content">
    <participants-list v-bind:participants="participants" v-on:remove-participant="onRemove($event)"></participants-list>
    <participant-add-form v-on:addParticipant="addParticipant($event)"></participant-add-form>
  </div>
 </div>
</template>

<script>
  import ParticipantsList from './components/ParticipantsList.vue';
  import ParticipantAddForm from './components/ParticipantAddForm.vue';

  export default {
    components: {
      ParticipantsList,
      ParticipantAddForm
    },
    data: function () {
      return {
        participants: [],
      }
    },
    methods: {
      addParticipant: function(newParticipant){
        this.participants.push(newParticipant);
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

h1 {
    background-color: #f7f7f7;
    padding: 1rem;
    border-left: 2px solid #666;
    color: #666;
}
</style>