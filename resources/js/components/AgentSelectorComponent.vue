<template>
    <div>
        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label for="select_a_type">Select agent type</label>
                    <select id="select_a_type" class="form-control" v-model="selected_agent_type" v-on:update="update()">
                        <option v-for="at in agent_types" v-bind:value="at" v-html="at.name">
                        </option>
                    </select>
                </div>

                <div v-if="selected_agent_type">

                    <div class="form-group">
                        <label for="agent_name">Name</label>
                        <input class="form-control" placeholder="Name your Agent" type="text" name="name" id="agent_name">
                    </div>

                    <div class="form-group">
                        <label>Sources</label>
                        <vue-tags-input
                            :tags="tags"
                            :autocomplete-items="agents"
                            @tags-changed="newTags => tags = newTags">
                        </vue-tags-input>
                    </div>

                    <div class="form-group">
                        <label>Receivers</label>
                        <vue-tags-input
                            :tags="tags"
                            :autocomplete-items="agents"
                            @tags-changed="newTags => tags = newTags">
                        </vue-tags-input>
                    </div>

                    <div class="form-group">
                        <label for="agent_schedule">Schedule</label>
                        <select class="form-control" name="schedule" id="agent_schedule">
                            <option value="every_1m">Every 1m</option>
                            <option value="every_2m">Every 2m</option>
                            <option value="every_5m">Every 5m</option>
                            <option value="every_10m">Every 10m</option>
                            <option value="every_30m">Every 30m</option>
                            <option value="every_1h">Every 1h</option>
                            <option value="every_2h">Every 2h</option>
                            <option value="every_5h">Every 5h</option>
                            <option value="every_12h">Every 12h</option>
                            <option value="every_1d">Every 1d</option>
                            <option value="every_2d">Every 2d</option>
                            <option value="every_7d">Every Monday</option>
                            <option value="midnight">Midnight</option>
                            <option value="1am">1am</option>
                            <option value="2am">2am</option>
                            <option value="3am">3am</option>
                            <option value="4am">4am</option>
                            <option value="5am">5am</option>
                            <option value="6am">6am</option>
                            <option value="7am">7am</option>
                            <option value="8am">8am</option>
                            <option value="9am">9am</option>
                            <option value="10am">10am</option>
                            <option value="11am">11am</option>
                            <option value="noon">Noon</option>
                            <option value="1pm">1pm</option>
                            <option value="2pm">2pm</option>
                            <option value="3pm">3pm</option>
                            <option value="4pm">4pm</option>
                            <option value="5pm">5pm</option>
                            <option value="6pm">6pm</option>
                            <option value="7pm">7pm</option>
                            <option value="8pm">8pm</option>
                            <option value="9pm">9pm</option>
                            <option value="10pm">10pm</option>
                            <option value="11pm">11pm</option>
                            <option value="never">Never</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agent_keep_events_for">Keep events</label>
                        <select class="form-control" name="keep_events_for" id="agent_keep_events_for">
                            <option value="0">Forever</option>
                            <option selected="selected" value="3600">1 hour</option>
                            <option value="21600">6 hours</option>
                            <option value="86400">1 day</option>
                            <option value="172800">2 days</option>
                            <option value="259200">3 days</option>
                            <option value="345600">4 days</option>
                            <option value="432000">5 days</option>
                            <option value="604800">7 days</option>
                            <option value="1209600">14 days</option>
                            <option value="1814400">21 days</option>
                            <option value="2592000">30 days</option>
                            <option value="3888000">45 days</option>
                            <option value="7776000">90 days</option>
                            <option value="15552000">180 days</option>
                            <option value="31536000">365 days</option>
                        </select>
                    </div>

                    <v-runtime-template :template="selected_agent_type.form"></v-runtime-template>
                </div>
            </div>
            <div class="col">
                <div v-if="selected_agent_type">
                    <vue-markdown v-bind:source="selected_agent_type.description"></vue-markdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueMarkdown from 'vue-markdown'
    import VRuntimeTemplate from "v-runtime-template";

    export default {
        components: {
            VueMarkdown,
            VRuntimeTemplate
        },
        data() {
            return {
                message: 'Hello',
                agent_types: [],
                selected_agent_type: null,
                tags: [],
                agents: [],
            }
        },
        methods: {
            update() {
                this.$forceUpdate()
            },
            getForm(id) {

            },
            getAgentTypesList() {
                axios.get('/api/agent/types').then(response => {
                    this.agent_types = response.data.list;
                });
            },
        },
        mounted() {


            this.getAgentTypesList();
            // axios.get('url', {});
            console.log('Component mounted.')
        }
    }
</script>
