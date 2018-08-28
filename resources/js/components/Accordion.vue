<template>
    <article class="message" :class="accordionClasses">
        <div class="message-header" @click="toggleAccordion">
            {{ file_name }}
        </div>

        <div class="message-body">
            <div class="message-content">
                <ul>
                    <li v-for="test_name in tests">
                        {{ test_name }}
                    </li>
                </ul>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    data: () => {
        return {
            isOpen: false
        }
    },
    props: {
        tests: null,
        file_name: null
    },
    methods: {
        toggleAccordion() {
            this.isOpen = !this.isOpen;
        }
    },
    computed: {
        accordionClasses: function() {
            return {
                'is-closed': !this.isOpen
            };
        }
    }
}
</script>
<style>
    .message {
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .message-header {
      cursor: pointer;
    }

    .message-body   {
      padding: 0;
      max-height: 10em;
      overflow: hidden;
      transition: 0.3s ease all;
    }

    .is-closed .message-body {
      max-height: 0;
    }

    .message-content {
      padding: 20px;
    }
</style>
