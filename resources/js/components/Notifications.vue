<template>
    <li class="nav-item dropdown" :class="showDropdown">
        <a @click="isDropdownOpen = !isDropdownOpen"
            class="nav-link"
            role="button"
            :href="linkToNotifications"
        >
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-pill badge-secondary" v-if="notifications.length" v-text="notifications.length"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" :class="showDropdown" v-if="notifications.length">
            <a class="dropdown-item"
                @click="markAsRead(notification)"
                :href="notification.data.link"
                v-for="notification in notifications"
                :key="notification.id"
            >
                {{ notification.data.text }}
            </a>
            <div class="dropdown-divider"></div>
            <a @click="markAllAsRead" class="dropdown-item" href="#">Marcar todo como leído</a>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                userDecoded: {},
                notifications: [],
                isDropdownOpen: false
            }
        },
        mounted() {
            // Echo.channel('new-posts')
            //     .listen('PostCreated', ({post}) => {
            //         console.log(post)
            //     })
            // Channel: private-App.User.1,
            // Event: Illuminate\Notifications\Events\BroadcastNotificationCreated
            Echo.private(`App.User.${this.userDecoded.id}`)
                .notification(notification => {
                    this.notifications.push({
                        id: notification.id,
                        data: {
                            link: notification.link,
                            text: notification.text
                        }
                    })
                })

            axios.get('/notifications')
                .then(res => {
                    this.notifications = res.data
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        },
        created() {
            this.userDecoded = JSON.parse(this.user)
        },
        methods: {
            markAsRead(notification) {
                axios.patch('/notifications/' + notification.id)
                    .then(res => {
                        this.notifications = res.data
                    })
            },
            markAllAsRead() {
                axios.patch('/notifications/')
                    .then(res => {
                        this.notifications = res.data
                    })
            }
        },
        computed: {
            showDropdown() {
                return [this.isDropdownOpen ? 'show' : '']
            },
            linkToNotifications() {
                return this.notifications.length ? '#' : '/notifications'
            }
        }
    }
</script>
