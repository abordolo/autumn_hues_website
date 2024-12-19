import { defineStore } from 'pinia';

export const useNotificationStore = defineStore('notificationStore', {
  state: () => ({
    // message:
    //   'My Message goes here. This is s avery long message that will be displayed in the notification.',
    // type: 'success',
    message: null,
    type: null,
    timeout: null,
  }),

  // getters: {
  //   doubleCount: (state) => state.count * 2,
  // },

  actions: {
    showNotification(message, type = 'success') {
      if (this.timeout) {
        this.$reset();
        clearTimeout(this.timeout);
      }

      this.message = message;
      this.type = type;

      this.timeout = setTimeout(() => {
        this.$reset();
      }, 3000);
    },
  },
});
