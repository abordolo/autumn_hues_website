const navItems = [
  {
    id: 1,
    name: 'Dashboard',
    href: route('admin.index'),
    componentPrefix: 'Admin/Home/',
  },
  {
    id: 2,
    name: 'User Role',
    href: route('admin.user-roles.index'),
    componentPrefix: 'Admin/UserRole/',
  },
  {
    id: 3,
    name: 'User',
    href: route('admin.users.index'),
    componentPrefix: 'Admin/User/',
  },
  {
    id: 4,
    name: 'Product Categories',
    href: route('admin.product-categories.index'),
    componentPrefix: 'Admin/ProductCategory/',
  },
  // {
  //   id: 5,
  //   name: 'Product Sub Categories',
  //   href: route('admin.product-sub-categories.index'),
  //   componentPrefix: 'Admin/ProductSubCategory/',
  // },
  // {
  //   id: 6,
  //   name: 'Products',
  //   href: route('admin.products.index'),
  //   componentPrefix: 'Admin/Product/',
  // },
  // {
  //   id: 61,
  //   name: 'Product Features',
  //   href: route('admin.product-features.index'),
  //   componentPrefix: 'Admin/ProductFeature/',
  // },
  // {
  //   id: 7,
  //   name: 'Product Item Variation Types',
  //   href: route('admin.product-item-variation-types.index'),
  //   componentPrefix: 'Admin/ProductItemVariationType/',
  // },
  // {
  //   id: 8,
  //   name: 'Product Item Variations',
  //   href: route('admin.product-item-variations.index'),
  //   componentPrefix: 'Admin/ProductItemVariation/',
  // },
  // {
  //   id: 9,
  //   name: 'Product Items',
  //   href: route('admin.product-items.index'),
  //   componentPrefix: 'Admin/ProductItem/',
  // },
];

export { navItems };
