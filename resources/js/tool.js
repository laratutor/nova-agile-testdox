import {Tabs, Tab} from 'vue-tabs-component';

Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-agile-testdox',
            path: '/nova-agile-testdox',
            component: require('./components/Tool')
        },
    ]);
    Vue.component('tabs', Tabs);
    Vue.component('tab', Tab);
    Vue.component('accordion', require('./components/Accordion'));
});
