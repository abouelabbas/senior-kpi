<template>
<div class="ms-chat-bubble ms-chat-message ms-chat-outgoing media clearfix">
                <div class="ms-chat-status ms-status-online ms-chat-img">
            <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
          </div>
          <slot></slot>
      </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
