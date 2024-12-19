import { useNotificationStore } from '@/Stores/NotificationStore';

const showNotification = (message, type) => {
  const notificationStore = useNotificationStore();
  notificationStore.showNotification(message, type);
};

const showSuccessNotification = (message) => {
  showNotification(message, 'success');
};

const showWarningNotification = (message) => {
  showNotification(message, 'warning');
};

export { showNotification, showSuccessNotification, showWarningNotification };
