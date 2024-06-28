<div class="searchbox">
    <style>
        html {
            --dark-gray: rgb(90, 90, 90);
            --light-gray: rgb(148, 148, 148);
            --focus-blue: rgb(69, 159, 189);
        }

        .searchbox {
            --target-size: 30px;
            /* https://web.dev/accessible-tap-targets/ */
            --box-height: var(--target-size);
            --border-radius: calc(var(--box-height) / 2);
            --border-width: 2px;
            --icon-size: calc(var(--box-height) * 3/4);
            --side-margin: calc(var(--border-radius) / 2);
            --icon-vertical-margin: calc((var(--box-height) - var(--icon-size)) / 2);
            --display: flex;
            --justify-content: right; /* Align items to the right */
            --width: 100%; /* Full width to be flexible */
        }

        /* shaping the box */
        .searchbox {
            height: var(--box-height);
            max-width: 561px;
            /* to follow the search box of google.com */
        }

        .searchbox input[type="search"] {
            border: var(--border-width) solid var(--dark-gray);
            border-radius: var(--border-radius);
            height: 100%;
            width: 100%;
        }

        /* Styling each component */
        .searchbox svg {
            fill: var(--dark-gray);
            height: var(--icon-size);
            width: var(--icon-size);
        }

        .searchbox input[type="search"] {
            -webkit-appearance: none;
            /* to prevent Safari from ignoring font-size */
            color: var(--dark-gray);
            font-family: 'Noto Sans', Verdana, sans-serif;
            font-size: 1rem;
        }

        .searchbox input[type="search"]::placeholder {
            color: var(--light-gray);
            opacity: 1;
            /* to override the default of Firefox */
        }

        /* positioning inner elements */
        .searchbox {
            position: relative;
        }

        .searchbox svg {
            position: absolute;
            left: var(--side-margin);
            top: var(--icon-vertical-margin);
            bottom: var(--icon-vertical-margin);
        }

        .searchbox input[type="search"] {
            padding-left: calc(var(--side-margin) + var(--icon-size) + 4px);
            padding-right: var(--side-margin);
        }

        input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
            /* Remove the left padding inside the box for Safari; see https://github.com/filipelinhares/ress/blob/master/ress.css */
        }

        /* Ensuring that tapping the icon focuses the search box */
        .searchbox svg {
            z-index: -1;
        }

        .searchbox input[type="search"] {
            background: transparent;
        }

        /* Styling focus state */
        .searchbox input[type="search"]:focus {
            border-color: var(--focus-blue);
            box-shadow: 0px 0px 5px var(--focus-blue);
            outline: 1px solid transparent;
            /* fallback for forced color modes; see https://www.sarasoueidan.com/blog/focus-indicators/#tips-for-styling-focus-indicators */
            /* it also removes the default focus ring imposed by browsers */
        }

        /* Custom-style the delete button that appears once the user enters text (Chrome and Safari only); see https://css-tricks.com/webkit-html5-search-inputs/#aa-styling-search-graphical-widgets */
        .searchbox input[type="search"]::-webkit-search-cancel-button {
            /* Remove default */
            -webkit-appearance: none;
            /* Now your own custom styles */
            background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='rgb(148, 148, 148)' %3E%3Cpath d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z' /%3E%3C/svg%3E%0A");
            height: calc(var(--box-height) / 2);
            width: calc(var(--box-height) / 2);
        }

        input[type="search"] {
            -webkit-tap-highlight-color: transparent;
            /* Otherwise, tapping will show a flash of grey background on iOS Safari; see https://twitter.com/masa_kudamatsu/status/1429387005658468356 */
        }
    </style>
    <svg aria-hidden="true" viewBox="0 0 24 24">
        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
    </svg>
    <input aria-label="Search for a place on the map" autocomplete="off" inputmode="search" placeholder="Enter place name or address" type="search" />
</div>