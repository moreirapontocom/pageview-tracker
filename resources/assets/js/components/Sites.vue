<template>
    <div>

        <div uk-grid>
            <div class="uk-width-2-3">
                <input type="text" class="uk-input" v-model="newSiteUrl" placeholder="Full website URL">
            </div>
            <div class="uk-width-1-3">
                <button type="button" class="uk-button uk-button-primary" @click="createSite()">Create Website</button>
            </div>
        </div>

        <div class="uk-divider-icon"></div>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Site URL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="site in sites">
                    <td>
                        <p>
                            {{ site.url }}
                        </p>
                    </td>
                    <td class="uk-text-right">
                        <a :href="'/sites/' + site.id" class="uk-button uk-button-primary">Open website &rarr;</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                endpoint: '/api',
                newSiteUrl: '',
                sites: []
            }
        },

        created() {
            this.fetchSites();
        },

        methods: {
            fetchSites() {
                axios.get(this.endpoint + '/sites')
                    .then(({data}) => {
                        if (data.status=='success') {
                            this.sites = data.sites;
                        } else
                            Uikit.notification('Ops. Error on fetching websites.');
                    });
            },
            createSite() {
                axios.post(this.endpoint + '/sites/create', {
                    siteurl: this.newSiteUrl
                }).then(({data}) => {
                    if (data.status=='success') {
                        UIkit.notification('Website created!');
                        this.sites.unshift(data.site);
                    } else
                        UIkit.notification('Error on creating website.');
                });
            }
        }
    }
</script>
