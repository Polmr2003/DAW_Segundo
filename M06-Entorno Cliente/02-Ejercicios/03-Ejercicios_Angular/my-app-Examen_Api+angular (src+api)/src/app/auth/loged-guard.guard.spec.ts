import { TestBed } from '@angular/core/testing';

import { logedGuardGuard } from './loged-guard.guard';

describe('logedGuardGuard', () => {
  let guard: logedGuardGuard;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    guard = TestBed.inject(logedGuardGuard);
  });

  it('should be created', () => {
    expect(guard).toBeTruthy();
  });
});
