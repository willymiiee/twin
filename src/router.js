import Vue from 'vue'
import Router from 'vue-router'

// Main Components
import base from './layouts/Base'
import page from './layouts/Page'

// Auth
import login from './views/auth/login'
import register from './views/auth/register'
import thankyou from './views/auth/thankyou'
import activate from './views/auth/activate'

// Error
import error404 from './views/error/error-404'
import error500 from './views/error/error-500'

// Dashboard Components
import dashboard from './views/dashboard'

// Location Components
import locationList from './views/administration/locations/list'
import locationForm from './views/administration/locations/form'

// Department Components
import departmentList from './views/administration/departments/list'
import departmentForm from './views/administration/departments/form'

// Job Title Components
import jobTitleList from './views/administration/jobtitles/list'
import jobTitleForm from './views/administration/jobtitles/form'

// Trips
import tripList from './views/trips/list'
import tripForm from './views/trips/form'

// Stores
import storeList from './views/stores/list'
import storeForm from './views/stores/form'

// User
import userList from './views/users/list'
import userForm from './views/users/form'

Vue.use(Router)

let routes = new Router({
  linkActiveClass: 'active',
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/app',
      component: base,
      meta: {
        requiresAuth: true
      },
      children: [
        {
          path: 'home',
          name: 'dashboard',
          component: dashboard
        },
        {
          path: 'administration',
          component: page,
          children: [
            {
              path: 'locations',
              component: page,
              children: [
                {
                  path: '',
                  name: 'location-list',
                  component: locationList
                },
                {
                  path: ':id',
                  name: 'location-form',
                  component: locationForm
                }
              ]
            },
            {
              path: 'departments',
              component: page,
              children: [
                {
                  path: '',
                  name: 'department-list',
                  component: departmentList
                },
                {
                  path: ':id',
                  name: 'department-form',
                  component: departmentForm
                }
              ]
            },
            {
              path: 'jobtitles',
              component: page,
              children: [
                {
                  path: '',
                  name: 'jobtitle-list',
                  component: jobTitleList
                },
                {
                  path: ':id',
                  name: 'jobtitle-form',
                  component: jobTitleForm
                }
              ]
            }
          ]
        },
        {
          path: 'trips',
          component: page,
          children: [
            {
              path: '',
              name: 'trip-list',
              component: tripList
            },
            {
              path: ':id',
              name: 'trip-form',
              component: tripForm
            }
          ]
        },
        {
          path: 'stores',
          component: page,
          children: [
            {
              path: '',
              name: 'store-list',
              component: storeList
            },
            {
              path: ':id',
              name: 'store-form',
              component: storeForm
            }
          ]
        },
        {
          path: 'users',
          component: page,
          children: [
            {
              path: '',
              name: 'user-list',
              component: userList
            },
            {
              path: ':id',
              name: 'user-form',
              component: userForm
            }
          ]
        }
      ]
    },
    {
      path: '/404',
      name: 'error-404',
      component: error404
    },
    {
      path: '/500',
      name: 'error-500',
      component: error500
    },
    {
      path: '/login',
      name: 'login',
      component: login,
      meta: {
        guest: true
      }
    },
    {
      path: '/register',
      name: 'register',
      component: register,
      meta: {
        guest: true
      }
    },
    {
      path: '/thankyou',
      name: 'thankyou',
      component: thankyou,
      meta: {
        guest: true
      }
    },
    {
      path: '/activate/:token',
      name: 'activate',
      component: activate,
      meta: {
        guest: true
      }
    },
    {
      path: '/',
      redirect: 'app'
    }
  ]
})

routes.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!localStorage.token) {
      next({
        path: '/login',
        params: { nextUrl: to.fullPath }
      })
    } else {
      next()
      // let user = JSON.parse(localStorage.getItem('user'))
      // if (to.matched.some(record => record.meta.is_admin)) {
      //   if (user.is_admin == 1) {
      //     next()
      //   } else {
      //     next({name: 'dashboard'})
      //   }
      // } else {
      //   next()
      // }
    }
  } else if (to.matched.some(record => record.meta.guest)) {
    if (!localStorage.token) {
      next()
    } else {
      next({ name: 'dashboard' })
    }
  } else {
    next()
  }
})

export default routes
