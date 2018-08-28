<template>
    <article class="message" :class="accordionClasses">
        <div :class="messageHeaderClasses" @click="toggleAccordion">
            <svg class="sidebar-icon fill-current align-middle mr-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 640" v-show="!isOpen">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
            </svg>
            <svg class="sidebar-icon fill-current align-middle mr-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 640" v-show="isOpen">
                <path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/>
            </svg>
            {{ file_name }}
        </div>

        <div class="message-body">
            <div class="message-content">
                    <p class="leading-tight p-2 hover:bg-30 border rounded border-white hover:border-primary" v-for="test_name in tests">
                        {{ test_name }}
                    </p>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    data: () => {
        return {
            isOpen: false,
            messageHeaderClasses: [
                'font-bold',
                'text-primary-dark',
                'bg-primary-10%',
                'text-xl',
                'p-2',
                'mt-2',
                'border',
                'border-primary-70%',
                'rounded-lg',
                'cursor-pointer'
            ]
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
    .message-body   {
      padding: 0;
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
