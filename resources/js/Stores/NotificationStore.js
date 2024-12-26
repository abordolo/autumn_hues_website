import { defineStore } from 'pinia';

export const useNotificationStore = defineStore('notificationStore', {
  state: () => ({
    // message:
    //   'My Message goes here. This is s avery long message that will be displayed in the notification.',
    // type: 'success',
    message: null,
    type: null,
    timeout: null,
    showMessageFor: 5000,
  }),

  // getters: {
  //   doubleCount: (state) => state.count * 2,
  // },

  actions: {
    showNotification(message, type = 'success') {
      if (this.timeout) {
        this.hideNotification();

        // set parameters after the notification is hidden
        setTimeout(() => {
          this.setParameters(message, type);
        }, 300);
      } else {
        this.setParameters(message, type);
      }
    },

    hideNotification() {
      if (this.timeout) clearTimeout(this.timeout);
      this.$reset();
    },

    setParameters(message, type) {
      this.message = message;
      this.type = type;
      this.timeout = setTimeout(() => {
        this.$reset();
      }, this.showMessageFor);
    },
  },
});
