import { defineStore } from "pinia";

export const useAuthStore = defineStore('authStore', {
    state: () => {
      return { count: 0 }
    },
    
    actions: {
      increment() {
        this.count++
      },
    },
  })
