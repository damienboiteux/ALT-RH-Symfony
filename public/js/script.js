document.querySelector( '#message' ).addEventListener( 'click', event => {
    event.target.remove();
} );

setTimeout( () => {
    document.querySelector( '#message' ).remove();
}, 3000 );