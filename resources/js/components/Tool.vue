<template>
    <div>
        <heading class="mb-6">Agile Testdox</heading>
        <div v-if="!loaded">
            <loader />
        </div>
        <div v-else>
            <div>
                <tabs>
                    <tab v-for="(files, key) in data" :key="key" :name="key">
                        <accordion
                            v-for="(tests, file_name) in files"
                            :key="file_name"
                            :file_name="file_name"
                            :tests="tests"
                            class="max-w-xl"
                        />
                    </tab>
                </tabs>
            </div>
        </div>
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
    .tabs-component {
      margin: 1em 0;
    }

    .tabs-component-tabs {
      border: dotted 1px #ddd;
      border-radius: 6px;
      margin-bottom: 5px;
      padding-left: 0;
    }

    @media (min-width: 700px) {
      .tabs-component-tabs {
        border: 0;
        align-items: stretch;
        display: flex;
        justify-content: flex-start;
        margin-bottom: -2px;
      }
    }

    .tabs-component-tab {
      color: #999;
      font-size: 16px;
      font-weight: 600;
      margin-right: 0;
      list-style: none;
      text-transform: capitalize;
    }

    .tabs-component-tab {
      border-bottom: dotted 1px #ddd;
    }

    .tabs-component-tab:hover {
      color: #666;
    }

    .tabs-component-tab.is-active {
      color: #000;
    }

    .tabs-component-tab.is-disabled * {
      color: #cdcdcd;
      cursor: not-allowed !important;
    }

    @media (min-width: 700px) {
      .tabs-component-tab {
        background-color: #fff;
        border: solid 1px #ddd;
        border-bottom: dotted 1px #ddd;
        border-radius: 3px 3px 0 0;
        margin-right: .5em;
        transform: translateY(2px);
        transition: transform .3s ease;
      }

      .tabs-component-tab.is-active {
        border-bottom: solid 1px #fff;
        z-index: 3;
        transform: translateY(0);
      }
    }

    .tabs-component-tab-a {
      align-items: center;
      color: inherit;
      display: flex;
      padding: .75em 1em;
      text-decoration: none;
    }

    .tabs-component-panels {
      padding: 1em 0;
      z-index: 2;
      position: relative;
    }

    @media (min-width: 700px) {
      .tabs-component-panels {
        border-top-left-radius: 0;
        background-color: #fff;
        border: solid 1px #ddd;
        border-radius: 0 6px 6px 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .05);
        padding: 1em;
      }
    }
</style>
