<template>
    <div v-if="loaded">
        <heading class="mb-6">Agile Testdox</heading>

        <card class="bg-60 flex flex-col" style="min-height: 300px">
            <div>
                <tab
                    v-on:select-tab="selectTab"
                    v-for="(value, key) in data"
                    :files="value"
                    :tab="tab"
                    :key="key"
                    :category="key"
                />

                <div v-show="tab === null" class="m-2">
                    Select a tab above to get started.
                </div>
            </div>
        </card>
    </div>
    <div v-else>
        <loader />
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            loaded: false,
            data: null,
            tab: null,
        }
    },
    mounted() {
        this.fetch()
    },
    methods: {
        async fetch() {
            let self = this
            Nova.request().get('/nova-vendor/nova-agile-testdox/endpoint').then(response => {
                self.data = response.data.data
                self.loaded=true
                console.log(self.data)
            })

        },
        selectTab(tab) {
            this.tab = tab;
        }
    }
}
</script>

<style>
    /* Scoped Styles */
</style>
