'use strict';

class Drawer {
  constructor( open = '#js-hamburger-button' ) {
    this.open = open;
  }
  setEvent() {
    $( this.open ).on( 'click.drawer', e => {
      if ( ! $( e.currentTarget ).hasClass( 'is-opened' ) ) {
        $( e.currentTarget ).addClass( 'is-opened' );
        $( '#js-drawer-nav' )
          .attr( 'aria-hidden', false )
          .attr( 'aria-expanded', true );
      } else {
        $( e.currentTarget ).removeClass( 'is-opened' );
        $( '#js-drawer-nav' )
          .attr( 'aria-hidden', true )
          .attr( 'aria-expanded', false );
      }
    });
  }
}
const drawer = new Drawer();
drawer.setEvent();

class Gnavi {
  constructor( navi = '.gnavi__item' ) {
    this.navi = navi;
  }
  setEvent() {
    $( this.navi )
      .on( 'mouseenter.gnavi', function() {
        if ( $( this ).children( '.gnavi__child' )[0]) {
          $( this )
            .children( '.gnavi__child' )
            .addClass( 'is-active' );
        }
      })
      .on( 'mouseleave.gnavi', function() {
        if ( $( this ).children( '.gnavi__child' )[0]) {
          $( this )
            .children( '.gnavi__child' )
            .removeClass( 'is-active' );
        }
      });
  }
}
const gnavi = new Gnavi();
gnavi.setEvent();

class GnaviCurrent {
  constructor( navi = '.gnavi__item' ) {
    this.navi = navi;
  }
  setEvent() {
    const path = location.pathname;
    const pathArray = path.split( '/' ).splice( 1 );
    $( this.navi )
      .find( 'a[href="/' + pathArray[0] + '"]' )
      .addClass( 'is-current' );
  }
}
const gnavicur = new GnaviCurrent();
gnavicur.setEvent();

class smoothscroll {
  constructor( target = 'a[href^="#"]' ) {
    this.target = target;
  }
  setEvent() {
    $( this.target ).on( 'click.smoothScroll', function( e ) {
      e.preventDefault();
      const href = $( this ).attr( 'href' );
      const target = $( '#pagetop' === href || '' === href ? 'html' : href );
      const speed = 500;
      const position = target.offset().top;

      $( 'body, html' ).animate(
        {
          scrollTop: position
        },
        speed,
        'swing'
      );
    });
  }
}
const smscroll = new smoothscroll();
smscroll.setEvent();
