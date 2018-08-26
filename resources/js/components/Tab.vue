<template>
    <div>
        <button
            href="#"
            @click="$emit('select-tab', category)"
            :class="[category === tab ? activeClass : '', inactiveClass]"
        >{{ category }}</button>

        <div v-show="tab === category" class="m-2">
            <div v-for="(tests, file_name) in files">
                {{ file_name }}

                <ul>
                    <li v-for="test_name in tests">
                        {{ test_name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        category: null,
        files: null,
        tab: null,
    },
    data: function () {
        return {
            activeClass: 'bg-white border border-white text-black font-bold m-2 py-2 px-4 rounded',
            inactiveClass: 'bg-transparent border border-black text-black font-bold m-2 py-2 px-4 rounded'
        }
    }
}
</script>

<style>
    /* Scoped Styles */
</style>
