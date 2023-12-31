/* import AllProducts from '../components/allProducts'; */
import AllProjects from '../components/allProject';
import NewProject from '../components/newProject';
import ViewProject from '../components/viewProject';
import EditProject from '../components/editProject';
import DeleteProject from '../components/delPro';
import NewProduct from '../components/newProduct';
import ViewProduct from '../components/viewProduct';
import EditProduct from '../components/editProduct';
import DeleteProduct from '../components/delPro';
import Roles from '../components/roles';
import NewRole from '../components/newRole';
import ViewRole from '../components/viewRole';
import EditRole from '../components/editRole';
import Permissions from '../components/permissions';
import NewPermission from '../components/newPermission';
import ViewPermission from '../components/viewPermission';
import EditPermission from '../components/editPermission';

const routes = [
    /* {
        path: '/admin',
        components: {
            default: AllProducts,
        },
        name: 'products',
    },
    {
        path: '/admin/products',
        components: {
            default: AllProducts,
        },
        name: 'allProducts',
    },

    {
        path: '/admin/products/create',
        components: {
            default: NewProduct,
        },
        name: 'createProducts',
    },

    {
        path: '/admin/products/:id',
        components: {
            default: ViewProduct,
        },
        name: 'viewProduct',
    },

    {
        path: '/admin/products/:id/edit',
        components: {
            default: EditProduct,
        },
        name: 'editProduct',
    },

    {
        path: '/admin/products/delete',
        components: {
            default: DeleteProduct,
        },
        name: 'deleteProduct',
    },

    */
    {
        path: '/admin',
        components: {
            default: AllProjects,
        },
        name: 'projects',
    },
    {
        path: '/admin/projects',
        components: {
            default: AllProjects,
        },
        name: 'allProjects',
    },

    {
        path: '/admin/projects/create',
        components: {
            default: NewProject,
        },
        name: 'createProjects',
    },

    {
        path: '/admin/projects/:id',
        components: {
            default: ViewProject,
        },
        name: 'viewProject',
    },

    {
        path: '/admin/projects/:id/edit',
        components: {
            default: EditProject,
        },
        name: 'editProject',
    },

    {
        path: '/admin/projects/delete',
        components: {
            default: DeleteProject,
        },
        name: 'deleteProject',
    },

    {
        path: '/admin/roles',
        components: {
            default: Roles,
        },
        name: 'roles',
    },

    {
        path: '/admin/roles/create',
        components: {
            default: NewRole,
        },
        name: 'createRole',
    },

    {
        path: '/admin/roles/:id',
        components: {
            default: ViewRole,
        },
        name: 'viewRole',
    },

    {
        path: '/admin/roles/:id/edit',
        components: {
            default: EditRole,
        },
        name: 'editRole',
    },

    {
        path: '/admin/permissions',
        components: {
            default: Permissions,
        },
        name: 'permissions',
    },

    {
        path: '/admin/permissions/create',
        components: {
            default: NewPermission,
        },
        name: 'createPermission',
    },

    {
        path: '/admin/permissions/:id',
        components: {
            default: ViewPermission,
        },
        name: 'viewPermission',
    },

    {
        path: '/admin/permissions/:id/edit',
        components: {
            default: EditPermission,
        },
        name: 'editPermission',
    },
];

export default routes;
