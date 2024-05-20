const { clearAllFilters } = require("../../commands/clearAllFilters");

describe("Pagina de Espaços", () => {
    beforeEach(() => {
        cy.viewport(1920, 1080);
        cy.visit("/espacos/#list");
    });

    it("clica em \"Acessar\" e entra na pagina no espaço selecionado", () => {
        cy.get(":nth-child(2) > .entity-card__footer > .entity-card__footer--action > .button").click();
        cy.url().should("include", "/espaco/13/#info");
        cy.contains('h1', 'Teatro Deodoro');
    });

    it("Garante que o botão limpar filtros na pagina de espaços funciona", () => {
        clearAllFilters([
            ".form > :nth-child(1) > :nth-child(2)",
            ".verified",
            ":nth-child(2) > .mc-multiselect > :nth-child(1) > .v-popper > .mc-multiselect--input",
            ":nth-child(1) > .mc-multiselect__option",
            ":nth-child(3) > .mc-multiselect > :nth-child(1) > .v-popper > .mc-multiselect--input",
            ":nth-child(1) > .mc-multiselect__option"
        ], "11 Espaços encontrados");
    });
});