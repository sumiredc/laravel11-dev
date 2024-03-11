import axios, {
  AxiosError,
  AxiosInstance,
  AxiosResponse,
  InternalAxiosRequestConfig,
} from "axios";

const headers = {
  "Content-Type": "application/json",
  "X-Requested-With": "XMLHttpRequest",
};

function requestCallback(
  request: InternalAxiosRequestConfig
): InternalAxiosRequestConfig {
  return request;
}

function responseCallback(response: AxiosResponse): AxiosResponse {
  return response;
}

function errorCallback(error: AxiosError): unknown {
  throw error;
}

type Handlers = {
  handleRequest?: typeof requestCallback;
  handleReponse?: typeof responseCallback;
  handleError?: typeof errorCallback;
};

export class AxiosConnection {
  public readonly axios: AxiosInstance = axios.create({
    withCredentials: true,
    responseType: "json",
    headers,
  });

  constructor({
    handleRequest = requestCallback,
    handleReponse = responseCallback,
    handleError = errorCallback,
  }: Handlers) {
    const { request, response } = this.axios.interceptors;
    request.use(handleRequest);
    response.use(handleReponse, handleError);
  }
}

export type ErrorResponseData = {
  message: string;
  errors?: { [key: string]: string };
};
