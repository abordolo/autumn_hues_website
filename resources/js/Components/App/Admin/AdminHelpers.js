import { dateString } from '@/Helpers/StringHelpers';

// formats database column names to names that can be displayed in the table header
// this is basically converting database column name to displayable string
const getFormattedColumnName = (column) => {
  let string = column;

  string = string.replace(/[_\-]/g, ' ');
  string = string.toLowerCase();

  let fields = string.split(' ');
  fields = fields.map((field) => {
    return field.charAt(0).toUpperCase() + field.slice(1);
  });

  return fields.join(' ');
};

// detects the type of the column
// logic to determine the type of the database column
// this is required to format the cells data accordingly
// used by getColumnClasses as well
// this function also used to determine what form field type will be displayed in the edit pages
const getColumnType = (column) => {
  // is it a boolean column
  const booleanColumns = ['active', 'available', 'featured', 'has_sub_items'];
  if (booleanColumns.includes(column)) return 'boolean';

  // it is a column for images
  if (column.includes('image') || column.includes('icon')) return 'image';

  // is it a date column
  let columnNames = ['date', 'email_verified_at', 'created_at', 'updated_at'];
  if (columnNames.includes(column)) return 'date';

  // should it be a textarea in the edit field
  if (column == 'description') return 'textarea';

  // default is text
  return 'text';
};

// gets the classes to be applied to the cells of the table
// these classes are not meant for the header cells
// do not apply these styles in the header cells
const getColumnClasses = (columnName, type) => {
  let classes = ['text-sm'];

  if (type == 'image') {
    classes.push('size-12');
  }

  // make the name prominent
  if (columnName == 'name') {
    classes.push('font-semibold');
  } else {
    classes.push('font-medium');
  }

  // we cannot apply colors to boolean columns
  // because we are yet to see those columns

  return classes;
};

// defines how a cell data will be displayed
// date from database will be converted to proper date string
// boolean value will be converted to active/inactive
const getFormattedData = (data, type) => {
  let formattedData = data;

  if (type == 'date') formattedData = dateString(data);
  if (type == 'boolean') formattedData = data ? 'Yes' : 'No';

  return formattedData;
};

export {
  getFormattedColumnName,
  getColumnType,
  getColumnClasses,
  getFormattedData,
};
