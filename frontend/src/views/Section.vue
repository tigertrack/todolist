<template>
    <div>
        <v-container>
            <v-row>
                <v-col cols="4">
                    <v-row>
                        <v-col cols="12" v-for="(item, index) in tasks" :key="index">
                            <v-card>
                                <v-card-title primary-title>
                                    {{item.title}}
                                </v-card-title>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks : []
        }
    },
    created() {
        window.axios
            .get('/section/'+this.$route.params.id)
            .then(response =>{
                this.tasks = response.data.tasks
            })
    },
}
</script>