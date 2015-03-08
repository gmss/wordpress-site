<?php
/*
 * Plugin Name:   GMSS Membership
 * Plugin URI:    http://www.github.com/gmss
 * Description:   A checkbox for tracking if a user wants to join your organisation and mailing list, or just log in and comment.
 * Version:       0.1
 * Author:        Andrew Taylor
 * Author URI:    http://www.andrewt.net/
 *
 * ...
 */

function addMembershipCheckbox($user)
{ ?>
    <h3>Society Membership</h3>
    <table class="form-table">
        <tr>
            <th><label for="gmss_membership">I would like to be a member</label></th>
            <td>
                <input type="checkbox" name="gmss_membership" value="true" <?php
                    if (get_the_author_meta('gmss_membership', $user->ID) == 'true')
                        echo 'checked';
                    ?> >
                   By checking this box you will be counted as a member of the Greater Manchester Skeptics Society.
                </input>
            </td>
        </tr>
        <tr>
            <th><label for="gmss_newsletter">I would like to receive the newsletter</label></th>
            <td>
                <input type="checkbox" name="gmss_newsletter" value="true" <?php
                    if (get_the_author_meta('gmss_newsletter', $user->ID) == 'true')
                        echo 'checked';
                    ?> >
                   By checking this box you will receive periodic email updates about the Society.
                </input>
            </td>
        </tr>
    </table>
<?php }

function saveMembershipPreference($user_id)
{
    update_user_meta($user_id,
        'gmss_membership',
        sanitize_text_field($_POST['gmss_membership']));
    update_user_meta($user_id,
        'gmss_newsletter',
        sanitize_text_field($_POST['gmss_newsletter']));
    if (!get_the_author_meta('unsubscribe_key', $user->ID))
        update_user_meta($user_id,
            'unsubscribe_key',
            strval(mt_rand(1000000, 9999999)));
}

add_action('show_user_profile', 'addMembershipCheckbox');
add_action('edit_user_profile', 'addMembershipCheckbox');
add_action('personal_options_update', 'saveMembershipPreference');
add_action('edit_user_profile_update', 'saveMembershipPreference');