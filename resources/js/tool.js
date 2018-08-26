Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-agile-testdox',
            path: '/nova-agile-testdox',
            component: require('./components/Tool'),
        },
    ])
})
