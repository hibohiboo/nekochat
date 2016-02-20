const mockKnex = jest.genMockFn();
mockKnex.schema = {
    createTableIfNotExists: jest.genMockFn().mockReturnValue(Promise.resolve()),
};

const Knex = module.exports = jest.genMockFn().mockReturnValue(mockKnex);
Knex.mockKnex = mockKnex;