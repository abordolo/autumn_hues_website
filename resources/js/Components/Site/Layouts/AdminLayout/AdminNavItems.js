const navItems = [
  {
    id: 1,
    name: 'Dashboard',
    href: route('admin.index'),
    componentPrefix: 'Admin/Dashboard/',
  },

  {
    id: 2,
    name: 'Product Categories',
    href: route('admin.product-categories.index'),
    componentPrefix: 'Admin/ProductCategory/Index',
  },

  {
    id: 3,
    name: 'Product Sub Categories',
    href: route('admin.product-sub-categories.index'),
    componentPrefix: 'Admin/ProductSubCategory/Index',
  },

  {
    id: 4,
    name: 'Products',
    href: route('admin.products.index'),
    componentPrefix: 'Admin/Product/Index',
  },

  {
    id: 5,
    name: 'Products SKUs',
    href: route('admin.product-skus.index'),
    componentPrefix: 'Admin/ProductSku/Index',
  },
];

export { navItems };
