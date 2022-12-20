let HOST = require("../host.js");
let {expect} = require('chai');

let {account} = require("../account");


describe('création de compte', () => {
   
    
    it('creates an account then log user', async() => {
        cy.visit(HOST+'register');
        cy.get('#username').type(account.username);
        cy.get('#exampleInputEmail1').type(account.email);
        cy.get('#exampleInputPassword1').type(account.password);
        cy.get('#exampleInputPassword2').type(account.password);
        cy.get('[name=submit]').click();
        cy.get('#dropdownMenu1').should('exist');
      
      })
  })