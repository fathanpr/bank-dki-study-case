import jQuery from 'jquery';
window.$ = jQuery;

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;

import Swal from 'sweetalert2'
window.Swal = Swal;

import select2 from 'select2';
select2();

import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
import 'admin-lte/plugins/select2/css/select2.min.css';
import 'admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';
import 'datatables.net-responsive-dt';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';

var base_url = window.location.origin;
window.base_url = base_url;