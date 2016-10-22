jQuery(function ($) {
    'use strict';
    /**
     * Clone fields
     * @param $container A div container which has all fields
     * @return void
     */
    function clone($container) {
        var $clone_last = $container.children('.rwmb-clone:last'),
            $clone = $clone_last.clone(),
            $input;
        $clone.insertAfter($clone_last);
        $input = $clone.find(':input[class|="rwmb"]');

        // Increment each field type
        $input.each(function () {
            var $this = $(this);
            if ($this.attr('type') === 'radio' || $this.attr('type') === 'checkbox') {
                // Reset 'checked' attribute
                $this.removeAttr('checked');
            }
            else {
                // Reset value
                $this.val('');
            }

            // Get the field name, and increment
            // Not all fields require id, such as 'autocomplete'
            var name = $this.attr('name');
            if (name) {
                name = name.replace(/\[(\d+)\]/, function (match, p1) {
                    return '[' + ( parseInt(p1, 10) + 1 ) + ']';
                });
                // Update the "name" attribute
                $this.attr('name', name);
            }

            // Get the field id, and increment
            // Not all fields require id, such as 'radio', 'checkbox_list'
            var id = $this.attr('id');
            if (id) {
                if (/_(\d+)/.test(id)) {
                    id = id.replace(/_(\d+)/, function (match, p1) {
                        return '_' + ( parseInt(p1, 10) + 1 );
                    });
                }
                else {
                    id += '_1';
                }

                // Update the "id" attribute
                $this.attr('id', id);
            }

            // Update the address_button "value" attribute
            var $address_button = $clone.find('.rwmb-map-goto-address-button');
            if ($address_button) {
                var value = $address_button.attr('value');
                if (/_(\d+)/.test(value)) {
                    value = value.replace(/_(\d+)/, function (match, p1) {
                        return '_' + ( parseInt(p1, 10) + 1 );
                    });
                }
                else {
                    value += '_1';
                }
                $address_button.attr('value', value);
            }
        });

        // Toggle remove buttons
        toggleRemoveButtons($input);

        // Trigger custom clone event
        $input.trigger('clone');
    }

    /**
     * Hide remove buttons when there's only 1 of them
     *
     * @param $el jQuery element. If not supplied, the function will applies for all fields
     *
     * @return void
     */
    function toggleRemoveButtons($el) {
        var $button;
        $el = $el || $('.rwmb-field');
        $el.each(function () {
            $button = $(this).find('.remove-clone');
            if ($button.length < 2) {
                $button.hide();
            }
            else {
                $button.show();
            }
        });
    }

    /**
     * Toggle add button
     * Used with [data-max-clone] attribute. When max clone is reached, the add button is hid and vice versa
     *
     * @param $input jQuery element of input div
     *
     * @return void
     */
    function toggleAddButton($input) {
        var $button = $input.find('.add-clone'),
            maxClone = parseInt($input.data('max-clone')),
            numClone = $input.find('.rwmb-clone').length;

        if (numClone == maxClone) {
            $button.hide();
        }
        else {
            $button.show();
        }
    }

    // Add more clones
    $('#poststuff').on('click', '.add-clone', function (e) {
        e.preventDefault();

        var $input = $(this).closest('.rwmb-input');

        if ($(this).closest('.rwmb-field').hasClass('rwmb-wysiwyg-wrapper')) {
            cloneWYSIWYG($input);
        }
        else {
            clone($input);
        }

        toggleRemoveButtons($input);
        toggleAddButton($input);
    })
        // Remove clones
        .on('click', '.remove-clone', function (e) {
            e.preventDefault();

            var $this = $(this),
                $input = $this.closest('.rwmb-input');

            // Remove clone only if there are 2 or more of them
            if ($input.find('.rwmb-clone').length < 2) {
                return;
            }

            $this.parent().remove();

            toggleRemoveButtons($input);
            toggleAddButton($input)
        });

    toggleRemoveButtons();

    $('.rwmb-input').sortable({
        handle: '.rwmb-clone-icon'
    });
});
