<template>
    <div>

        <a href="/sites">&larr; back to my websites</a>

        <br><br>

        <h2>Report for <strong>{{ site.url }}</strong></h2>
        <a :href="site.url" target="_blank">{{ site.url }}</a>

        <br><br>

        <strong>Copy/Paste this line into all pages you'd like to track:</strong> <code>&lt;img src="{{ projectUrl }}/tracking/{{ site.tracking_code }}"&gt;</code>
        <br>
        <strong>Or add this image into your e-mail marketing app:</strong> <code>{{ projectUrl }}/tracking/{{ site.tracking_code }}</code>

        <div class="uk-divider-icon"></div>

        <h3>Pageviews</h3>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Session</th>
                    <th>Page</th>
                    <th>Referer</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="pv in site.pageviews.pageviews">
                    <td>{{ pv.viewer_ip }}</td>
                    <td>{{ pv.viewer_session }}</td>
                    <td>{{ pv.page }}</td>
                    <td>{{ pv.referal }}</td>
                    <td>{{ pv.created_at }}</td>
                </tr>

            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['appUrl','siteId'],

        data() {
            return {
                endpoint: '/api',
                projectUrl: this.$attrs.appurl,
                site: {
                    created_at: '',
                    id: '',
                    pageviews: '',
                    tracking_code: '',
                    updated_at: '',
                    url: '',
                    pageviews: []
                }
            }
        },

        created() {
            this.fetchSite(this.$attrs.siteid);
        },

        methods: {
            fetchSite(siteId) {
                axios.get(this.endpoint + '/sites/' + siteId)
                    .then(({data}) => {
                        if (data.status=='success') {
                            this.site = data.site;
                        } else
                            UIkit.notification('Error on fetching site infos.');
                    });
            }
        }
    }
</script>