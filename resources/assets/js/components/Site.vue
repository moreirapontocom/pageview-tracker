<template>
    <div>

        <a href="/sites">&larr; back to my websites</a>

        <br><br>

        <h2>Report for <strong>{{ site.url }}</strong></h2>
        <a :href="site.url" target="_blank">{{ site.url }}</a>

        <br><br>

        <strong>Copy/Paste this script into all pages (on footer) you'd like to track:</strong>
        <br><br>
        <code>
&lt;script&gt;<br>
&nbsp;&nbsp; var script = document.createElement('script');<br>
&nbsp;&nbsp; script.src="{{ projectUrl }}/tracking.js";<br>
&nbsp;&nbsp; script.id="{{ site.tracking_code }}";<br>
&nbsp;&nbsp; document.getElementsByTagName('head')[0].appendChild(script);<br>
&lt;/script&gt;
        </code>

        <div class="uk-divider-icon"></div>

        <h3>Pageviews</h3>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>Session</th>
                    <th>Page</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="pv in site.pageviews.pageviews">
                    <td>{{ pv.viewer_ip }}</td>
                    <td>{{ pv.viewer_session }}</td>
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