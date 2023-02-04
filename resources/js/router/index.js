import Vue from 'vue';
import Router from 'vue-router';

/**
 * Layzloading will create many files and slow on compiling, so best not to use lazyloading on devlopment.
 * The syntax is lazyloading, but we convert to proper require() with babel-plugin-syntax-dynamic-import
 * @see https://doc.laravue.dev/guide/advanced/lazy-loading.html
 */

Vue.use(Router);

/* Layout */
import Layout from '@/layout';

/* Router for modules */
import elementUiRoutes from './modules/element-ui';
import componentRoutes from './modules/components';
import chartsRoutes from './modules/charts';
import tableRoutes from './modules/table';
import adminRoutes from './modules/admin';
import nestedRoutes from './modules/nested';
import errorRoutes from './modules/error';
import excelRoutes from './modules/excel';
import permissionRoutes from './modules/permission';

/**
 * Sub-menu only appear when children.length>=1
 * @see https://doc.laravue.dev/guide/essentials/router-and-nav.html
 **/

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
    roles: ['admin', 'editor']   Visible for these roles only
    permissions: ['view menu zip', 'manage user'] Visible for these permissions only
    title: 'title'               the name show in sub-menu and breadcrumb (recommend set)
    icon: 'svg-name'             the icon show in the sidebar
    noCache: true                if true, the page will no be cached(default is false)
    breadcrumb: false            if false, the item will hidden in breadcrumb (default is true)
    affix: true                  if true, the tag will affix in the tags-view
  }
**/

export const constantRoutes = [
  {
    path: '/redirect',
    component: Layout,
    hidden: true,
    children: [
      {
        path: '/redirect/:path*',
        component: () => import('@/views/redirect/index'),
      },
    ],
  },
  {
    path: '/login',
    component: () => import('@/views/login/index'),
    hidden: true,
  },
  {
    path: '/auth-redirect',
    component: () => import('@/views/login/AuthRedirect'),
    hidden: true,
  },
  {
    path: '/404',
    redirect: { name: 'Page404' },
    component: () => import('@/views/error-page/404'),
    hidden: true,
  },
  {
    path: '/401',
    component: () => import('@/views/error-page/401'),
    hidden: true,
  },
  {
    path: '',
    component: Layout,
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        component: () => import('@/views/dashboard/index'),
        name: 'Dashboard',
        meta: { title: 'dashboard', icon: 'dashboard', noCache: false },
      },
    ],
  },
  {
    path: '/reservation',
    component: Layout,
    redirect: '/reservation/index',
    children: [
      {
        path: 'reservation',
        component: () => import('@/views/reservation/index'),
        name: 'Reservation',
        meta: { title: 'reservation', icon: 'tab', noCache: false },
      },
    ],
  },

  {
    path: '/registration',
    component: Layout,
    redirect: '/registration/index',
    children: [
      {
        path: 'registration',
        component: () => import('@/views/registration/index'),
        name: 'registration',
        meta: { title: 'registration', icon: 'edit', noCache: false },
      },
    ],
  },

  {
    path: '/hotel',
    component: Layout,
    redirect: '/hotel/index',
    children: [
      {
        path: 'hotel',
        component: () => import('@/views/hotel/index'),
        name: 'Hotel',
        meta: { title: 'hotel', icon: 'excel', noCache: false },
      },
    ],
  },
  {
    path: '/room',
    component: Layout,
    redirect: '/room/index',
    children: [
      {
        path: 'room',
        component: () => import('@/views/room/index'),
        name: 'Room',
        meta: { title: 'room', icon: 'table', noCache: false },
      },
    ],
  },

  {
    path: '/facility',
    component: Layout,
    redirect: '/facility/index',
    children: [
      {
        path: 'facility',
        component: () => import('@/views/facility/index'),
        name: 'facility',
        meta: { title: 'facility', icon: 'tree-table', noCache: false },
      },
    ],
  },

  {
    path: '/corporate',
    component: Layout,
    redirect: '/corporate/index',
    children: [
      {
        path: 'corporate',
        component: () => import('@/views/facility/index'),
        name: 'corporate',
        meta: { title: 'corporate', icon: 'nested', noCache: false },
      },
    ],
  },

  {
    path: '/channel',
    component: Layout,
    redirect: '/channel/index',
    children: [
      {
        path: 'cahnnel',
        component: () => import('@/views/channel/index'),
        name: 'channel',
        meta: { title: 'channel', icon: 'list', noCache: false },
      },
    ],
  },

  {
    path: '/accounting',
    component: Layout,
    redirect: '/accounting/index',
    children: [
      {
        path: 'accounting',
        component: () => import('@/views/facility/index'),
        name: 'accounting',
        meta: { title: 'accounting', icon: 'dollar', noCache: false },
      },
    ],
  },

  {
    path: '/keeping',
    component: Layout,
    redirect: '/keeping/index',
    children: [
      {
        path: 'keeping',
        component: () => import('@/views/facility/index'),
        name: 'keeping',
        meta: { title: 'keeping', icon: 'example', noCache: false },
      },
    ],
  },

  {
    path: '/archive',
    component: Layout,
    redirect: '/archive/index',
    children: [
      {
        path: 'archive',
        component: () => import('@/views/facility/index'),
        name: 'archive',
        meta: { title: 'archive', icon: 'layout', noCache: false },
      },
    ],
  },

  {
    path: '/documentation',
    component: Layout,
    redirect: '/documentation/index',
    children: [
      {
        path: 'index',
        component: () => import('@/views/documentation/index'),
        name: 'Documentation',
        meta: { title: 'documentation', icon: 'documentation', noCache: true },
      },
    ],
  },
  {
    path: '/profile',
    component: Layout,
    redirect: '/profile/edit',
    children: [
      {
        path: 'edit',
        component: () => import('@/views/users/SelfProfile'),
        name: 'SelfProfile',
        meta: { title: 'userProfile', icon: 'user', noCache: true },
      },
    ],
  },
  {
    path: '/guide',
    component: Layout,
    redirect: '/guide/index',
    children: [
      {
        path: 'index',
        component: () => import('@/views/guide/index'),
        name: 'Guide',
        meta: { title: 'guide', icon: 'guide', noCache: true },
      },
    ],
  },
  elementUiRoutes,
];

export const asyncRoutes = [
  permissionRoutes,
  componentRoutes,
  chartsRoutes,
  nestedRoutes,
  tableRoutes,
  adminRoutes,
  {
    path: '/theme',
    component: Layout,
    redirect: 'noredirect',
    children: [
      {
        path: 'index',
        component: () => import('@/views/theme/index'),
        name: 'Theme',
        meta: { title: 'theme', icon: 'theme' },
      },
    ],
  },
  {
    path: '/clipboard',
    component: Layout,
    redirect: 'noredirect',
    meta: { permissions: ['view menu clipboard'] },
    children: [
      {
        path: 'index',
        component: () => import('@/views/clipboard/index'),
        name: 'ClipboardDemo',
        meta: {
          title: 'clipboardDemo',
          icon: 'clipboard',
          roles: ['admin', 'manager', 'editor', 'user'],
        },
      },
    ],
  },
  errorRoutes,
  excelRoutes,
  {
    path: '/zip',
    component: Layout,
    redirect: '/zip/download',
    alwaysShow: true,
    meta: { title: 'zip', icon: 'zip', permissions: ['view menu zip'] },
    children: [
      {
        path: 'download',
        component: () => import('@/views/zip'),
        name: 'ExportZip',
        meta: { title: 'exportZip' },
      },
    ],
  },
  {
    path: '/pdf',
    component: Layout,
    redirect: '/pdf/index',
    meta: { title: 'pdf', icon: 'pdf', permissions: ['view menu pdf'] },
    children: [
      {
        path: 'index',
        component: () => import('@/views/pdf'),
        name: 'Pdf',
        meta: { title: 'pdf' },
      },
    ],
  },
  {
    path: '/pdf/download',
    component: () => import('@/views/pdf/Download'),
    hidden: true,
  },
  {
    path: '/i18n',
    component: Layout,
    meta: { permissions: ['view menu i18n'] },
    children: [
      {
        path: 'index',
        component: () => import('@/views/i18n'),
        name: 'I18n',
        meta: { title: 'i18n', icon: 'international' },
      },
    ],
  },
  {
    path: '/external-link',
    component: Layout,
    children: [
      {
        path: 'https://github.com/tuandm/laravue',
        meta: { title: 'externalLink', icon: 'link' },
      },
    ],
  },
  { path: '*', redirect: '/404', hidden: true },
];

const createRouter = () =>
  new Router({
    // mode: 'history', // require service support
    scrollBehavior: () => ({ y: 0 }),
    base: process.env.MIX_LARAVUE_PATH,
    routes: constantRoutes,
  });

const router = createRouter();

// Detail see: https://github.com/vuejs/vue-router/issues/1234#issuecomment-357941465
export function resetRouter() {
  const newRouter = createRouter();
  router.matcher = newRouter.matcher; // reset router
}

export default router;
