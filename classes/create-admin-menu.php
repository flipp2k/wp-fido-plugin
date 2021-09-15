<?php 
/**
 * This file will create admin menu page
 */


 class FA_Create_Admin_Page {

    public function __construct() {
        add_action( 'admin_menu', [$this, 'create_admin_menu'] );
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'FA-settings';
        
        add_menu_page(
            __('Fido awards', 'fido-awards'),
            __('Fido awards', 'fido-awards'),
            $capability,
            $slug,
            [$this, 'menu_page_templage'],
            'dashicons-buddicons-replies'
        );
    }

    public function menu_page_templage() {
        //echo('<div class="wrap"><div id="fido-admin-app"></div></div>');
        echo('<div>
        <h2>Fido Awards Settings</h2>
    </div>
    <div id="fido-setting-form" className="wrap">
        <form method = "POST" action="?page=add_data">
            <table className="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label>FirstName</label>
                        </th>
                        <td>
                            <input
                                type="text"
                                name="firstName"
                                className="regular-text"
                            />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label htmlFor="lastName">lastName</label>
                        </th>
                        <td>
                            <input
                                type="text"
                                id="lastName"
                                name="lastName"
                                className="regular-text"
                            />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label htmlFor="email">email</label>
                        </th>
                        <td>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                className="regular-text"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" value="submit">
                Save
            </button>
        </form>
    </div>');
    }

   




 }

 new FA_Create_Admin_Page();